<?php

declare(strict_types=1);

namespace Setono\SyliusAnalyticsPlugin\Entity;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Locale\Model\LocaleInterface;

interface GoogleAnalyticConfigInterface extends ResourceInterface
{
    public function getId(): ?int;
    public function getTrackingId(): ?string;
    public function setTrackingId(string $trackingId): void;
    public function getLists(): Collection;
    public function setLists($lists): void;
    public function addList(GoogleAnalyticListInterface $googleAnalyticList): void;
    public function removeList(GoogleAnalyticListInterface $googleAnalyticList): void;
    public function hasList(GoogleAnalyticListInterface $googleAnalyticList): bool;
    public function getListForChannelAndLocale(ChannelInterface $channel, LocaleInterface $locale): ?GoogleAnalyticListInterface;
}