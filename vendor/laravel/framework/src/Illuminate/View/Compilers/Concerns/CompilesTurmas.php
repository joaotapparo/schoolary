<?php

namespace Illuminate\View\Compilers\Concerns;

trait CompilesTurmas
{
    /**
     * Compile the conditional class statement into valid PHP.
     *
     * @param  string  $expression
     * @return string
     */
    protected function compileClass($expression)
    {
        $expression = is_null($expression) ? '([])' : $expression;

        return "class=\"<?php echo \Illuminate\Support\Arr::toCssTurmas{$expression} ?>\"";
    }
}
