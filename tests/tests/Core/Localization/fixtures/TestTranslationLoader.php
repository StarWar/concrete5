<?php

namespace Concrete\Tests\Core\Localization\Fixtures;

use Concrete\Core\Localization\Translator\Translation\Loader\AbstractTranslationLoader;
use Concrete\Core\Localization\Translator\TranslatorAdapterInterface;

/**
 * Simple translation loader that can be used for the tests.
 *
 * @author Antti Hukkanen <antti.hukkanen@mainiotech.fi>
 */
class TestTranslationLoader extends AbstractTranslationLoader
{

    /**
     * {@inheritDoc}
     */
    public function loadTranslations(TranslatorAdapterInterface $translatorAdapter)
    {
        $translator = $translatorAdapter->getTranslator();
        $translator->addTranslationFile('phparray', str_replace(DIRECTORY_SEPARATOR, '/', __DIR__) . '/translations.php');
    }

}
