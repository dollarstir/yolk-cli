<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Install extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'install {name : enter namne}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Install a new Yolk app';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {           
        //
       
        $projectname= $this->argument(key: 'name');
       $url = 'http://192.168.199.126/frame/yolk/api.php?name='.$projectname;
       $client  = curl_init($url);
       curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	    $response = curl_exec($client);

	
	    $result = json_decode($response);


      
       

// prefix: base_url/
// http://192.168.199.120/1kball/dev/api/v1/

// 1kball1min
// luckypick5
// speedy1min
// speedy5d
// lucky5d
// fsat3
// fast3
// luckyfast3
// 1kballpc28
// speedypc28
// luckypc28
// lucky3d
// speedypk10
// luckypk10
// speedy11x5
// lucky11x5
// lucky49x7
// 1kball5d
        
        // $projectname = $this->ask('What is the name of your project?');
        $this->info('Creating a new Yolk app '.$projectname);
        $this->info('This may take a few minutes...');
        $this->info('Please wait...');

        // $ch = curl_init();

        // set URL and other appropriate options

        $path = getcwd();
        // $url = 'https://github.com/dollarstir/demo/archive/refs/heads/main.zip';
        // $local_file = $path.'/'.$projectname.'.zip';

        // $fp = fopen($local_file, 'w+');
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_FILE, $fp);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // curl_exec($ch);
        // curl_close($ch);
        // fclose($fp);

        // Open the archive file
        // shell_exec('unzip '.$local_file.' -d '.$path);
        $this->info($result);
        shell_exec(' curl '.$result.' --progress-bar  --output '.$projectname.'.zip');
        $this->info('Unzipping........');
        $this->info('Please wait...');


        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                if(!is_dir($path.'/'.$projectname))
                {
                    mkdir($path.'/'.$projectname, 0777);
                }
            $this->info('Copying files........');
            shell_exec('tar -zxvf' .$projectname.'.zip -C' .$path .'/'.$projectname); 
            $this->info('setting up yolk environment........');
            shell_exec( 'Del '.$projectname.'.zip');
        } else {
            shell_exec('unzip '.$projectname.'.zip -d '.$path.'/'.$projectname);
             shell_exec('rm '.$projectname.'.zip');
        }
       

        $this->info('Done!');
        $this->notify('Yolk', 'Your new app is ready to go!', 'yolk.png');
        $this->info('Your new app is ready to go!');
        $this->info('To run your app, cd into the directory '.$projectname.' and start your server with php -S localhost:8000');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
