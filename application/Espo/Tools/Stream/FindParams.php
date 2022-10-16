<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2022 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Tools\Stream;

use Espo\Core\Field\DateTime;
use Espo\Core\Select\SearchParams;

/**
 * @immutable
 */
class FindParams
{
    public const FILTER_POSTS = 'posts';
    public const FILTER_UPDATES = 'updates';

    private SearchParams $searchParams;
    private bool $skipOwn;
    private ?DateTime $after;
    private ?string $filter;

    public function __construct(
        SearchParams $searchParams,
        bool $skipOwn = false,
        ?DateTime $after = null,
        ?string $filter = null
    ) {
        $this->searchParams = $searchParams;
        $this->skipOwn = $skipOwn;
        $this->after = $after;
        $this->filter = $filter;
    }

    public function getSearchParams(): SearchParams
    {
        return $this->searchParams;
    }

    public function getMaxSize(): ?int
    {
        return $this->searchParams->getMaxSize();
    }

    public function getOffset(): ?int
    {
        return $this->searchParams->getOffset();
    }

    public function skipOwn(): bool
    {
        return $this->skipOwn;
    }

    public function getAfter(): ?DateTime
    {
        return $this->after;
    }

    public function getFilter(): ?string
    {
        return $this->filter;
    }
}