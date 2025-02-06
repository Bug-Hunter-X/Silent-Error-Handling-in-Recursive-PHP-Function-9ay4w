# Silent Error Handling in Recursive PHP Function

This repository demonstrates a common but subtle bug in PHP: silently ignoring errors during recursive data processing. The `processData` function recursively iterates through an array, but when it encounters a string containing 'error', it silently ignores it instead of handling the error appropriately. This can lead to unexpected behavior and make debugging difficult.

## Bug

The `bug.php` file contains the function with the flawed error handling.  The function should not silently ignore errors.  Instead, it should handle them gracefully, such as throwing an exception or logging the error.

## Solution

The `bugSolution.php` file shows a corrected version of the function that properly handles errors by throwing an exception when an error string is encountered.  This allows calling functions to handle the error appropriately and improves the robustness of the code.