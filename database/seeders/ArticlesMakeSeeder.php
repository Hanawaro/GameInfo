<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
           [
               'userId' => 0,
               'data' => '{"preview":{"preview-header":{"type":"header-5","value":"Руководство по Databricks Certified Associate Developer for Apache Spark 3.0 "},"9d7361d8-72ff-408e-0c54-3ffdc5620c83":{"type":"paragraph","value":"В этой статье я поделюсь с вами ресурсами и методологией, которые я активно использовал для прохождения сертификации “Databricks Certified Associate Developer for Apache Spark 3.0”. "},"e13f37e2-2e14-5100-ce43-4188eb80fddf":{"type":"paragraph","value":""}},"content":{"content-header":{"type":"header-3","value":""}}}',
               'like' => rand(0, 20),
               'dislike' => rand(0, 20),
               'views' => rand(10, 100)]
        ]);
        DB::table('articles')->insert([
            [
                'userId' => 0,
                'data' => '{"preview":{"preview-header":{"type":"header-5","value":"Руководство по Databricks Certified Associate Developer for Apache Spark 2.0 "},"9d7361d8-72ff-408e-0c54-3ffdc5620c83":{"type":"paragraph","value":"В этой статье я поделюсь с вами ресурсами и методологией, которые я активно использовал для прохождения сертификации “Databricks Certified Associate Developer for Apache Spark 3.0”. "},"e13f37e2-2e14-5100-ce43-4188eb80fddf":{"type":"paragraph","value":""}},"content":{"content-header":{"type":"header-3","value":""}}}',
                'like' => rand(0, 20),
                'dislike' => rand(0, 20),
                'views' => rand(10, 100)]
        ]);
        DB::table('articles')->insert([
            [
                'userId' => 0,
                'data' => '{"preview":{"preview-header":{"type":"header-5","value":"Руководство по Databricks Certified Associate Developer for Apache Spark 1.0 "},"9d7361d8-72ff-408e-0c54-3ffdc5620c83":{"type":"paragraph","value":"В этой статье я поделюсь с вами ресурсами и методологией, которые я активно использовал для прохождения сертификации “Databricks Certified Associate Developer for Apache Spark 3.0”. "},"e13f37e2-2e14-5100-ce43-4188eb80fddf":{"type":"paragraph","value":""}},"content":{"content-header":{"type":"header-3","value":""}}}',
                'like' => rand(0, 20),
                'dislike' => rand(0, 20),
                'views' => rand(10, 100)]
        ]);
        DB::table('articles')->insert([
            [
                'userId' => 0,
                'data' => '{"preview":{"preview-header":{"type":"header-5","value":"Руководство по Databricks Certified Associate Developer for Apache Spark 4.0 "},"9d7361d8-72ff-408e-0c54-3ffdc5620c83":{"type":"paragraph","value":"В этой статье я поделюсь с вами ресурсами и методологией, которые я активно использовал для прохождения сертификации “Databricks Certified Associate Developer for Apache Spark 3.0”. "},"e13f37e2-2e14-5100-ce43-4188eb80fddf":{"type":"paragraph","value":""}},"content":{"content-header":{"type":"header-3","value":""}}}',
                'like' => rand(0, 20),
                'dislike' => rand(0, 20),
                'views' => rand(10, 100)]
        ]);
    }
}
