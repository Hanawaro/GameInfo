$(document).ready(function () {

    // ajax

    function send(url, to) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let data = new FormData($('form')[0]);
        data.append('article', JSON.stringify(article));

        $.ajax({
            url: url,
            method: 'post',
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response === 'success') {
                    window.location.replace(to);
                } else {
                    alert('danger');
                }
            },
            fail: function () {
                alert('danger');
            }
        });
    }

    window.send = send;

    function alert(type) {
        let alertBox = $(`.messenger .alert-${type}`);
        if (!alertBox.hasClass('active')) {
            alertBox.addClass('active');

            setTimeout(function () {
                alertBox.removeClass('active');
            }, 3000);
        }
    }

    // editor

    $('.editor .dropdown-item').on('click', function () {
        add(this);
    });
    $('.editor .remove').click(function () {
        remove(this)
    });

    $('.editor .content')
        .on('input', function () {
            keypressEvent($(this));
        })
        .on('paste', function (e) {
            e.preventDefault();
            let text = (e.originalEvent || e).clipboardData.getData('text/plain');
            document.execCommand("insertHTML", false, text);
        });

    function keypressEvent(element) {
        let id = $(element).parent().data('element');
        let articleClass = $(element).parent().parent().parent().attr('class');

        for (let index of article[articleClass].keys()) {
            if (article[articleClass][index]['id'] === id) {
                if (!(article[articleClass][index]['type'] === 'img') && !(article[articleClass][index]['type'] === 'video'))
                    article[articleClass][index]['value'] = element.text()
                break;
            }
        }

        if (!element.text().trim().length) {
            element.empty();
        }
    }

    let guid = () => {
        let s4 = () => {
            return Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
        }
        return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
    }

    let elements = {
        'paragraph': ['p', 'Параграф'],
        'header-3': ['h3', 'Заголовок 1'],
        'header-5': ['h5', 'Заголовок 2'],
        'img': ['input', 'Изображение'],
        'video': ['p', 'Видео']
    }

    let article = {
        'preview': new Array(
            {
                'id': 'preview-header',
                'type': 'header-5',
                'value': ''
            }
        ),
        'content': new Array(
            {
                'id': 'content-header',
                'type': 'header-3',
                'value': ''
            }
        )
    };

    function add(value) {
        let btn = $(value);
        let container = btn.parent().parent().parent();
        let articleClass = container.parent().parent().attr('class');

        let after = container.data('element');

        let name = '';
        for (let [key, value] of Object.entries(elements)) {
            if (btn.hasClass(key))
                name = key;
        }

        if (name === '')
            return;

        let tag = elements[name][0];
        let placeholder = elements[name][1];
        let id = guid();

        let result = '';

        switch (name) {
            case 'img':
                result = `
                    <div class="custom-file content">
                        <label class="custom-file-label">
                            Выберите фото...
                            <input type="file" accept=".jpg, .jpeg, .png, .gif" name="${id}" class="custom-file-input">
                        </label>
                    </div>
                `;
                break;
            case 'video':
                result = `
                    <div class="content btn-group dropup">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Медиа элемент
                        </button>
                        <div class="dropdown-menu">
                            <label>
                                <input type="text" name="${id}" placeholder="Ссылка на youtube">
                            </label>
                        </div>
                    </div>
                `;
                break;
            default:
                result = `<${tag} class="content" contenteditable="true" data-placeholder="${placeholder}"></${tag}>`;
        }

        $(`.${after}`).after(`
            <div class="statement ${name} ${id}" data-element="${id}">
                <div class="add btn-group dropright">
                    <button type="button" class="btn px-0 py-0 d-inline-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false">
                        <svg height="24" width="24" class="svg-icon">
                            <circle cx="8.5" cy="6.5" r="1.5"></circle>
                            <circle cx="8.5" cy="12.5" r="1.5"></circle>
                            <circle cx="8.5" cy="18.5" r="1.5"></circle>
                            <circle cx="14.5" cy="6.5" r="1.5"></circle>
                            <circle cx="14.5" cy="12.5" r="1.5"></circle>
                            <circle cx="14.5" cy="18.5" r="1.5"></circle>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item paragraph">Параграф</a>
                        <a class="dropdown-item header-3">Заголовок 1</a>
                        <a class="dropdown-item header-5">Заголовок 2</a>
                        <a class="dropdown-item img">Изображение</a>
                        <a class="dropdown-item video">Видео</a>
                    </div>
                </div>

                ${result}

                <div class="remove btn px-0 py-0 d-inline-flex justify-content-center align-items-center">
                    <svg height="16" width="16" class="svg-icon"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 9V16H9V9H16V7H9V0H7V7H0V9H7Z"></path></svg>
                </div>
            </div>
        `)

        for (let index of article[articleClass].keys()) {
            if (article[articleClass][index]['id'] === after) {
                article[articleClass].splice(index + 1, 0, {
                    'id': id,
                    'type': name,
                    'value': ''
                });
                break;
            }
        }

        $('.editor .dropdown-item').off('click').on('click', function () {
            add(this);
        });
        $('.editor .remove').off('click').on('click', function () {
            remove(this);
        });
        $('.editor .content')
            .off()
            .on('input', function () {
                keypressEvent($(this));
            })
            .on('paste', function (e) {

                e.preventDefault();
                let text = (e.originalEvent || e).clipboardData.getData('text/plain');
                document.execCommand("insertHTML", false, text);
            });

        $('.editor .content .btn').on('click', function () {
            let element = $(this).parent().find('input').first();

            setTimeout(function () {
                element.focus();
            }, 100)
        });
    }

    function remove(value) {
        let btn = $(value);
        let container = btn.parent();
        let articleClass = container.parent().parent().attr('class');

        let id = container.data('element');

        $(`.${id}`).remove();

        for (let index of article[articleClass].keys()) {
            if (article[articleClass][index]['id'] === id) {
                delete article[articleClass][index];
                break;
            }
        }
    }

});
