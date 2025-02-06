```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result = array_merge($result, processData($item));
        } else if (is_string($item) && strpos($item, 'error') !== false) {
            // Handle error here.  This is where the bug lies.
            // The error is silently ignored.  It should be properly handled. 
            continue; // Incorrect handling of errors.
        } else {
            $result[] = $item;
        }
    }
    return $result;
}

$data = ['a', 'b', 'error: something went wrong', 'c', ['d', 'e', 'error: another error']];
$processedData = processData($data);
print_r($processedData); // Output misses the errors.
```