<?php

namespace App\State;

use App\Entity\Animal;
use App\Entity\IdentificationCard;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class AnimalProcessor implements ProcessorInterface
{
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private ProcessorInterface $persistProcessor,
        private Security $security
    ) {}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        if ($data instanceof Animal) {
            $data->setOwner($this->security->getUser());

            if ($data->getCard() === null) {
                $card = new IdentificationCard();
                $card->setDateEdition(new \DateTime());
                $card->setEmplacement('À définir');
                $card->setPaysNaissance($data->getPaysNaissance() ?? 'France');
                $card->setSignesParticuliers($data->getSignesParticuliers());
                $card->setAnimal($data);
                $data->setCard($card);
            }
        }

        return $this->persistProcessor->process($data, $operation, $uriVariables, $context);
    }
}
