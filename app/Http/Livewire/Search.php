<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class Search extends Component
{
    /**
     * Will be searched text
     *
     * @var string
     */
    public $search;

    /**
     * Show the area of search
     *
     * @var bool
     */
    public $show;

    /**
     * Set initial value of variables
     *
     * @return void
     */
    public function mount()
    {
        $this->search = '';
        $this->show = false;
    }

    /**
     * Set true to $show
     *
     * @return void
     */
    public function open()
    {
        $this->show = true;
    }

    /**
     * Set false to $show
     *
     * @return void
     */
    public function close()
    {
        $this->show = false;
    }

    /**
     * 渲染查詢結果
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        // Add a new empty set
        $results = collect();

        if (strlen($this->search) >= 2) {
            $like = '%' . $this->search . '%';
            $results = Topic::query()->where(function ($query) use ($like) {
                $query->where('title', 'like', $like);
            })->get();
        }

        return view('livewire.search', ['results' => $results]);
    }
}
