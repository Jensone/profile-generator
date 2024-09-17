<?php

namespace Jensone\ProfileGenerator\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

#[AsCommand(
    name: 'profile:generator',
    description: 'Generate a profile page for your application',
)]
class ProfileGeneratorCommand extends Command
{
    private $projectDir;

    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filesystem = new Filesystem();

        $io->title('Profile Generator');

        if (!$io->confirm('Do you have an entity to manage users in your application?', false)) {
            $io->error('Please create a user entity first before generating a profile page. Use the make:user command.');
            return Command::FAILURE;
        }

        $controllerUrl = "https://raw.githubusercontent.com/Jensone/profile-generator/main/src/Ressources/views/controller/ProfileController.php";
        $templateUrl = "https://raw.githubusercontent.com/Jensone/profile-generator/main/src/Ressources/views/templates/account.html.twig";
        $tailwindUrl = "https://raw.githubusercontent.com/Jensone/profile-generator/main/src/Ressources/views/templates/tailwindcss.html.twig";
        $bootstrapUrl = "https://raw.githubusercontent.com/Jensone/profile-generator/main/src/Ressources/views/templates/bootstrap.html.twig";

        $controllerContent = file_get_contents($controllerUrl);
        $controllerPath = $this->projectDir . '/src/Controller/ProfileController.php';
        $filesystem->dumpFile($controllerPath, $controllerContent);

        $templateContent = file_get_contents($tailwindUrl);
        $templatePath = $this->projectDir . '/templates/profile/tailwindcss.html.twig';
        $filesystem->dumpFile($templatePath, $templateContent);

        $templateContent = file_get_contents($bootstrapUrl);
        $templatePath = $this->projectDir . '/templates/profile/bootstrap.html.twig';
        $filesystem->dumpFile($templatePath, $templateContent);

        $templateContent = file_get_contents($templateUrl);
        $templatePath = $this->projectDir . '/templates/profile/account.html.twig';
        $filesystem->dumpFile($templatePath, $templateContent);

        $io->success([
            'Profile page generated successfully!',
            'Controller created at: ' . $controllerPath,
            'Template created at: ' . $templatePath,
            'You can now visit /profile to see your new profile page.',
            'Feel free to modify the generated files to suit your needs.',
            'Star the project on GitHub: https://github.com/Jensone/profile-generator'
        ]);

        return Command::SUCCESS;
    }
}