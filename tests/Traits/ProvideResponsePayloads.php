<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat\Tests\Traits;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Factory;

trait ProvideResponsePayloads
{
    protected function leanCompaniesResponse(): PromiseInterface
    {
        return $this->prepareResponse(<<<'PAYLOAD'
[
    {
        "_id": "56bccdf554d64d837d01be8c",
        "name": "Chevron",
        "externalId": "chevron",
        "sourceId": "0012000001UchdsAAB"
    },
    {
        "_id": "56ccc2d39b760ff232295798",
        "sourceId": "0012000001Tjy5xAAB",
        "name": "United Oil & Gas, Singapore",
        "externalId": "CD355120-B"
    },
    {
        "_id": "56bccdf554d64d837d01be63",
        "name": "Burger King",
        "externalId": "",
        "sourceId": "0012000001VKEiVAAX"
    },
    {
        "_id": "56bccdf554d64d837d01be4e",
        "name": "McDonalds",
        "externalId": "mcdonalds",
        "sourceId": "0012000001TwtO7AAJ"
    }
]
PAYLOAD
        );
    }

    protected function companyResponse(): PromiseInterface
    {
        return $this->prepareResponse(<<<'PAYLOAD'
{
    "_id": "61006bc89a3e0b702ed8ea49",
    "shareable": {
        "team": {
            "fields": []
        },
        "enabled": false,
        "euIds": [],
        "sunits": false
    },
    "followers": [],
    "domains": [
        "stjohns.k12.fl.us"
    ],
    "collaborators": [],
    "products": [],
    "tags": [],
    "lastPerformedTriggers": [],
    "owner": "60ccb1c5965cc9e0f3848075",
    "custom": {
        "Days in Phase": 0,
        "Days until renewal": 364,
        "# Overdue Invoices": 1
    },
    "name": "Tenet",
    "phase": "Onboarding",
    "status": "prospect",
    "phaseSince": "2021-07-27T20:25:44.430Z",
    "sunits": {
        "5b49b52a1ac87812818de26d": {
            "status": "on",
            "default": true
        }
    },
    "createDate": "2021-07-27T20:25:44.430Z",
    "lastUpdated": "2021-08-11T16:12:41.657Z",
    "lastTouchByType": {
        "note": "2021-08-22T16:15:50.772Z"
    },
    "sales": [
        {
            "_id": "61016c80675c1b871faf2d4f",
            "value": 10000,
            "product": "Advanced Onboarding",
            "_currency": {
                "_id": "USD",
                "rate": 1,
                "symbol": "$",
                "isBase": true,
                "__v": 0,
                "overrides": {}
            },
            "salesDate": "2021-07-28T00:00:00.000Z",
            "companyId": "61006bc89a3e0b702ed8ea49",
            "companyName": "Tenet",
            "__v": 0,
            "externalId": "sale-1234"
        }
    ],
    "licenses": [],
    "features": {},
    "usage": {},
    "csmScoreLog": [],
    "documents": [],
    "links": [],
    "alerts": [],
    "lastActivities": [],
    "updatedAt": "2021-08-09T16:54:17.298Z",
    "__v": 0,
    "h": 3,
    "autoRenews": false,
    "customerTo": "2022-07-27T00:00:00.000Z",
    "headId": "6100772b919fd37905810fc6",
    "lastRenewal": "2021-07-27T00:00:00.000Z",
    "mr": 15000,
    "mrTotal": 15000,
    "mrr": 0,
    "mrrTotal": 0,
    "nrr30": 15000,
    "nrrTotal": 15000,
    "renewalDate": "2022-07-27T00:00:00.000Z",
    "renewalDaysFromNow": 363,
    "renewalMrr": 0,
    "nps": 8.5,
    "sourceId": "119",
    "hDiff": -2,
    "hDiffDate": "2021-08-04T20:21:24.117Z",
    "hProfile": "5f87f152f5fc6f26057ac901",
    "orgCount": 0,
    "orgPathCount": 0
}
PAYLOAD
        );
    }

    protected function prepareResponse(string $jsonPayload): PromiseInterface
    {
        return Factory::response(json_decode($jsonPayload, true, 512, JSON_THROW_ON_ERROR));
    }
}
