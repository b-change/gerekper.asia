<?php namespace Connor\ShortURL\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Carbon\Carbon;
use Connor\ShortURL\Models\ShortURL;
use Exception;

/**
 * System status report widget.
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 */
class Statistics extends ReportWidgetBase
{
    /**
     * Renders the widget.
     */
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function widgetDetails()
    {
        return [
            'name'        => 'Short URL Statistics Widget',
            'description' => 'Displays Short URL related statistics'
        ];
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'Widget title',
                'default'           => 'Short URL Statistics',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'The Widget Title is required.'
            ]
        ];
    }

    protected function loadData()
    {
        $this->setProperty('total', ShortURL::sum('clicks'));

        $this->setProperty('thisMonth', ShortURL::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->sum('clicks'));
        $this->setProperty('lastMonth', ShortURL::where('created_at', '>=', Carbon::now()->subMonths(1)->startOfMonth())
            ->where('created_at', '<=', Carbon::now()->startOfMonth())
            ->sum('clicks'));

        $this->setProperty('thisMonthName', Carbon::now()->format('F'));
        $this->setProperty('lastMonthName', Carbon::now()->subMonth()->format('F'));

        $top = ShortURL::orderBy('clicks', 'desc')
            ->select('clicks', 'short')
            ->first();
        if ($top)
        {
            $this->setProperty('top', $top->clicks);
            $this->setProperty('topShort', $top->short);
        }
    }
}