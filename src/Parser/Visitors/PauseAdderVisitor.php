<?php
namespace MagicTest\MagicTest\Parser;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\NodeVisitorAbstract;

class PauseAdderVisitor extends NodeVisitorAbstract
{
    public function leaveNode(Node $node)
    {
        if ($node instanceof MethodCall) {
            if ($this->requiresPauseAfter($node)) {
                // dd($node);
            }
        }
    }

    public function requiresPauseAfter(Node $node)
    {
        return in_array($node->name->__toString(), [
            'click',
        ]);
    }
}
