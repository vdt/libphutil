<?php

/*
 * Copyright 2012 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Test cases for functions in pht.php.
 *
 * @group testcase
 */
final class PhutilPHTTestCase extends ArcanistPhutilTestCase {

  public function testPHT() {
    $this->assertEqual('beer', pht('beer'));
    $this->assertEqual('1 beer(s)', pht('%d beer(s)', 1));

    PhutilTranslator::getInstance()->addTranslations(
      array(
        '%d beer(s)' => array('%d beer', '%d beers'),
      ));

    $this->assertEqual('1 beer', pht('%d beer(s)', 1));

    PhutilTranslator::getInstance()->setLanguage('cs');
    PhutilTranslator::getInstance()->addTranslations(
      array(
        '%d beer(s)' => array('%d pivo', '%d piva', '%d piv'),
      ));

    $this->assertEqual('5 piv', pht('%d beer(s)', 5));
  }

}
