<?php

namespace NachoBrito\SpamFilterBundle\Command;

use NachoBrito\SpamFilterBundle\Services\VectorSpaceModel;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of VectorizeCommand
 *
 * @author nacho
 */
class CalculateTFIDFCommand extends ContainerAwareCommand
{

    /**
     * 
     */
    protected function configure()
    {

        $this
                ->setName('boecrawler:calculateTFIDF')
                ->setDescription('Calculates TFIDF.');
    }

    /**
     * 
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Vector Space Model - Calculate inverse freqs');
        /* @var $vector VectorSpaceModel */
        $vector = $this->getContainer()->get('nbspamfilter.vector_space_model');
        $vector->calculateIDF();
    }

}
