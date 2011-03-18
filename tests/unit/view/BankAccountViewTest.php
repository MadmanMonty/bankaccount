<?php
/**
 * @small
 */
class BankAccountViewTest extends ViewTestCase
{
    /**
     * @covers BankAccountView::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->request->expects($this->once())
                      ->method('get')
                      ->with($this->equalTo('id'))
                      ->will($this->returnValue(1));

        $this->response->expects($this->once())
                       ->method('get')
                       ->with($this->equalTo('balance'))
                       ->will($this->returnValue(0));

        $view = new BankAccountView($this->request, $this->response);

        $this->assertEquals(
          "The balance of bank account #1 is 0.00.\n", $view->render()
        );
    }
}
