<?php

namespace App\Http\Controllers\Dean;

use App\Models\Question;
use Exception;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $settings1 = [
            'chart_title' => 'Total users',
            'chart_type' => 'number_block',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'email_verified_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_period' => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-3',
            'entries_number' => '5',
            'translation_key' => 'user',
        ];

        $settings1 = $this->getSettings1($settings1);

        $settings2 = [
            'chart_title' => 'Total testimonial',
            'chart_type' => 'number_block',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Testimonial',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_days' => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-3',
            'entries_number' => '5',
            'translation_key' => 'testimonial',
        ];

        $settings2 = $this->getSettings1($settings2);

        $settings3 = [
            'chart_title' => 'Total Questions',
            'chart_type' => 'number_block',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Question',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-3',
            'entries_number' => '5',
            'translation_key' => 'question',
        ];

        $settings3 = $this->getSettings1($settings3);

        $settings4 = [
            'chart_title' => 'Total  Category of Questions',
            'chart_type' => 'number_block',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Category',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_days' => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-3',
            'entries_number' => '5',
            'translation_key' => 'category',
        ];

        $settings4 = $this->getSettings1($settings4);

        $settings5 = [
            'chart_title' => 'Total Departments',
            'chart_type' => 'number_block',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Department',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-3',
            'entries_number' => '5',
            'translation_key' => 'department',
        ];

        $settings5 = $this->getSettings1($settings5);

        $settings6 = [
            'chart_title' => 'Last week Question',
            'chart_type' => 'pie',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Question',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_days' => '7',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-6',
            'entries_number' => '5',
            'translation_key' => 'question',
        ];

        $chart6 = new LaravelChart($settings6);

        $settings7 = [
            'chart_title' => 'Questions by Category',
            'chart_type' => 'bar',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Question',
            'group_by_field' => 'name',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_days' => '30',
            'column_class' => 'col-md-6',
            'entries_number' => '5',
            'relationship_name' => 'category',
            'translation_key' => 'question',
        ];

        $chart7 = new LaravelChart($settings7);

        $unanswered_questions = Question::with('category')
            ->where('status', 0)
            ->count();
        $answered = Question::with('category')
            ->where('status', 1)
            ->count();
        $rejected = Question::with('category')
            ->where('status',2)
            ->count();



        return view('dean.home',compact(
            'settings1',
            'settings2',
            'settings3',
            'settings4',
            'settings5',
            'chart6',
            'chart7',
            'unanswered_questions',
            'answered',
            'rejected')
        );
    }

    /**
     * @param array $settings1
     * @return array
     */
    public function getSettings1(array $settings1): array
    {
        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where($settings1['filter_field'], '>=',
                        now()->subDays($settings1['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }
        return $settings1;
    }
}
