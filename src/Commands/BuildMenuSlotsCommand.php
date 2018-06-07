<?php

namespace Lari\MenuManager\Commands;

use Illuminate\Console\Command;
use Lari\MenuManager\Models\Menu;
use Lari\MenuManager\Models\MenuSlot;

class BuildMenuSlotsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:slots:build {--m|menu=false} {--t|truncate=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates menu slots';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->truncate();
        foreach (config('menu.slots', []) as $slot) {
            $model = MenuSlot::firstOrCreate([
                'key' => $slot,
            ]);
            $this->info(sprintf('Processed slot: %s', $slot));

            $this->createMenuForSlot($model);
        }
    }

    private function createMenuForSlot($slot)
    {
        if ($this->option('menu') === false) {
            return;
        }

        $slot->menus()->create([
            'name'         => ucfirst($slot->key),
            'is_available' => true,
        ]);
    }

    private function truncate()
    {
        if ($this->option('truncate') === false) {
            return;
        }

        MenuSlot::truncate();
        Menu::truncate();
    }
}
