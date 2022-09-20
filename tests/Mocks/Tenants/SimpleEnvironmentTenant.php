<?php

declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * Copyright Tenancy for Laravel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/tenancy
 */

namespace Tenancy\Tests\Mocks\Tenants;

use Tenancy\Identification\Contracts\Tenant as TenantContract;
use Tenancy\Identification\Drivers\Environment\Contracts\IdentifiesByEnvironment;
use Tenancy\Testing\Mocks\Tenant;

class SimpleEnvironmentTenant extends Tenant implements IdentifiesByEnvironment
{
    public function tenantIdentificationByEnvironment(): ?TenantContract
    {
        if ($tenant = \getenv('TENANT')) {
            return $this->newQuery()
                ->where('name', $tenant)
                ->first();
        }

        return null;
    }
}
