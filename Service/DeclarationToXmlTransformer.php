<?php

namespace KCH\Bundle\PCC3Bundle\Service;

use KCH\PCC3\Deklaracja;

/**
 * Class transform KCH\PCC3\Deklaracja object to XML string.
 *
 * @author DŁ
 */
class DeclarationToXmlTransformer extends AbstractTransformer
{
    /**
     * Transform method KCH\PCC3\Deklaracja object to XML.
     *
     * @param Deklaracja $declaration
     *
     * @author DŁ
     * @return mixed|string
     */
    public function transform(Deklaracja $declaration)
    {
        return $this->serializer->serialize($declaration, 'xml');
    }
}