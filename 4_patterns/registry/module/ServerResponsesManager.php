<?php

// Registry class.
class ServerResponsesManager
{
    public $roundInfoData = null;

    // First level of registry.
    public function setRoundInfoResponse($response)
    {
        $this->roundInfoData = $response;
    }

    public function getRoundInfoData()
    {
        return $this->roundInfoData;
    }

    // Second level of registry.
    public function getPresentationInfoData()
    {
        return $this->roundInfoData->presentationInfo;
    }

    public function getPrizeInfoData()
    {
        return $this->roundInfoData->getPrizeInfoData;
    }

    // Third level of registry.
    public function getRoundTiming()
    {
        return $this->roundInfoData->presentationInfo->getRoundTiming();
    }

    public function getRoundWinners()
    {
        return $this->roundInfoData->prizeInfo->getWinners();
    }
}