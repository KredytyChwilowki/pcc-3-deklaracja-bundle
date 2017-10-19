<?php
namespace KCH\Bundle\PCC3Bundle\Test;

use KCH\Bundle\PCC3Bundle\Service\DeclarationToXmlTransformer;
use KCH\PCC3\Deklaracja;
use PHPUnit\Framework\TestCase;

/**
 * @codeCoverageIgnore
 */
class DeclarationToXmlTransformerTest extends TestCase
{
    public function testSimpleGenerationEmptyDeclaration()
    {
        $declarationToXmlTransformer = new DeclarationToXmlTransformer(Deklaracja::class);
        $result = $declarationToXmlTransformer->transform(new Deklaracja());

        $this->assertXmlStringEqualsXmlString('<?xml version="1.0" encoding="UTF-8"?>
<Deklaracja xmlns="http://crd.gov.pl/wzor/2015/12/11/2973/"/>
',$result);
    }
}