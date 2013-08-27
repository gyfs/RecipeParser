<?php

require_once './bootstrap.php';

class ImporterCookscomTestIE9 extends PHPUnit_Framework_TestCase {

    public function test_nilla_wafers() {
        $path = "data/clipped/cooks_com_barbecued_chicken_wings_ie_9_0_orig.html";
        $url = "http://www.cooks.com/rec/view/0,1733,128183-246195,00.html";

        $recipe = Importer::parse(file_get_contents($path), $url);
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Barbecued Chicken Wings", $recipe->title);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals(7, count($recipe->ingredients[0]['list']));

        // Expect that the line starting with "Submitted by:" has been stripped.
        $this->assertEquals(4, count($recipe->instructions[0]['list']));
    }

}

?>
