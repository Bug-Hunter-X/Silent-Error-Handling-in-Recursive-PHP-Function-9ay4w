```php
function processData(array $data): array
{
    $result = [];
    foreach ($data as $item) {
        if (is_array($item)) {
            $result = array_merge($result, processData($item));
        } else if (is_string($item) && strpos($item, 'error') !== false) {
            //Proper error handling
            throw new Exception("Error encountered: " . $item);
        } else {
            $result[] = $item;
        }
    }
    return $result;
}

$data = ['a', 'b', 'error: something went wrong', 'c', ['d', 'e', 'error: another error']];
try{
    $processedData = processData($data);
    print_r($processedData);
} catch (Exception $e){
    echo "Exception caught: " . $e->getMessage();
}
```