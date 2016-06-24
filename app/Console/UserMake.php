<?php 

namespace App\Console;

use Illuminate\Console\Command;
use Hash;
use Config;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\User;

class UserMake extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'user:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user';

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
    public function fire()
    {

        if (User::where('email', $this->option('e'))->count()) {
            echo 'a User by that email already exists';
            exit();
        }

        $admin = User::create([
                'email' => $this->option('e'),
                'password' => Hash::make($this->option('p')),
                'name' => $this->option('n')
            ]);

        echo 'User created';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            //['?', InputArgument::OPTIONAL, 'Help']
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['e', null, InputOption::VALUE_REQUIRED, 'Email', null],
            ['p', null, InputOption::VALUE_REQUIRED, 'Password', null],
            ['n', null, InputOption::VALUE_REQUIRED, 'Display Name', null],
        ];
    }

}
