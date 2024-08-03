<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat\Enum;

enum IdType: string
{
    case PLANHAT = '';
    case EXTERNAL = 'extid-';
    case SOURCE = 'srcid-';
}
