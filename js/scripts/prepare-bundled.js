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

const fs = require('fs');
const buildUtils = require('../build-utils');

const libs = require('./../../frontend/libs.json');

const libDir = './client/lib';
const bundledDir = './client/lib/bundled';

if (!fs.existsSync(libDir)) {
    fs.mkdirSync(libDir);
}

if (!fs.existsSync(bundledDir)) {
    fs.mkdirSync(bundledDir);
}

fs.readdirSync(bundledDir)
    .filter(file => file !== 'espo.js')
    .forEach(file => fs.unlinkSync(bundledDir + '/' + file));

/** @var {string[]} */
const libSrcList = buildUtils.getBundleLibList(libs);

libSrcList.forEach(src => {
    let dest = bundledDir + '/' + src.split('/').slice(-1);

    fs.copyFileSync(src, dest);
});