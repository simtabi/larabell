<?php

namespace Simtabi\Larabell\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{

    private const PATH = __DIR__ . '/../../';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bells:install {--views : Indicates we should install view for your customization}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Bells resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {

        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    "jquery-toast-plugin" => "^1.3.2",
                    "sweetalert2"         => "^11.0.18",
                ] + $packages;
        });

        if ($this->option('views')) {
            // Views...
            (new Filesystem)->ensureDirectoryExists(resource_path('views/vendor'));

            (new Filesystem)->copyDirectory(self::PATH.'resources/views', resource_path('views/vendor'));

            copy(self::PATH.'resources/views/init.blade.php', resource_path('views/vendor/init.blade.php'));
        }

        // JS Scripts
        (new Filesystem)->ensureDirectoryExists(public_path('vendor/bells'));
        (new Filesystem)->ensureDirectoryExists(public_path('vendor/bells/css'));
        (new Filesystem)->ensureDirectoryExists(public_path('vendor/bells/js'));

        copy(self::PATH.'public/css/jquery.toast.css',  public_path('vendor/bells/css/jquery.toast.css'));
        copy(self::PATH.'public/js/jquery.toast.js',  public_path('vendor/bells/js/jquery.toast.js'));

        $this->info('Bells resources installed successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    /**
     * Installs the given Composer Packages into the application.
     *
     * @param  mixed  $packages
     * @return void
     */
    protected function requireComposerPackages($packages)
    {
        $composer = $this->option('composer');

        if ($composer !== 'global') {
            $command = ['php', $composer, 'require'];
        }

        $command = array_merge(
            $command ?? ['composer', 'require'],
            is_array($packages) ? $packages : func_get_args()
        );

        (new Process($command, base_path(), ['COMPOSER_MEMORY_LIMIT' => '-1']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }

    /**
     * Update the "package.json" file.
     *
     * @param  callable  $callback
     * @param  bool  $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    /**
     * Delete the "node_modules" directory and remove the associated lock files.
     *
     * @return void
     */
    protected static function flushNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
            $files->delete(base_path('package-lock.json'));
        });
    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
