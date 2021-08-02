<?php

namespace App\Traits\Ebay;

use Session;
use Illuminate\Http\Request;

use DTS\eBaySDK\Sdk;
use DTS\eBaySDK\Constants;
use DTS\eBaySDK\Types\RepeatableType;
use DTS\eBaySDK\Browse\Types;
use DTS\eBaySDK\Browse\Enums;

use App\Traits\Utils;

trait Browse
{
    use Utils;

    public function get_item(Request $request) {

        $sdk = new Sdk([
            'authorization' => 'v^1.1#i^1#r^0#f^0#p^3#I^3#t^H4sIAAAAAAAAAOVYX2wcRxn32Y7TxKQhTUjBjcR5E16a7N3sv9u9Jb7mkrOTC7F98dkmcYmcud1Ze+q93dXOXOyNWuE6qBCDqgRFBFShhgL9o6pNWjUBBbCaVAWRh+SBthJUCgKhCAESikBU8ADMnu3L2UBi+\/JwEn6x9pvv3++b33z3zYDJljWPPrPvmY\/WRVY3npsEk42RiNAK1rSs2v5gU2PbqgZQpRA5N7ltsnmq6fc7CSzant6HiOc6BEUnirZD9LKwgyv5ju5CgonuwCIiOjX0fLr7gC7GgO75LnUN1+ai2UwHl1STCdmUC4KlQSNpCEzqzPvsdzs4QZQETU0WgCIWZNNgy4SUUNYhFDq0gxOBKPBA44HYDwRd0nQBxBRZG+Kig8gn2HWYSgxwqXK2etnWr0r17plCQpBPmRMulU135XvT2UxnT\/\/OeJWv1FwZ8hTSEln4tcc1UXQQ2iV09zCkrK3nS4aBCOHiqdkIC53q6flkVpB+udKqKopKomAWRCQmzaR8X0rZ5fpFSO+eRyjBJm+VVXXkUEyDe1WUVaPwBDLo3FcPc5HNRMN\/B0vQxhZGfgfXuTt9eCDf2cdF87mc7x7DJjJDpIwykgySiipxKR8GJrI9HswFmfU0V+JFUfa4jonDgpFoj0t3I5YxWlwXsaouTKnX6fXTFg2zqdaTKvUThsINnd3BEh11wj1FRVaEaPnz3tWfp8MdAtwvQigqVC1LkxKWAJMAqf+dEOFZXx4pUuG+pHO5eJgLKsCAL0J\/DFHPhgbiDVbeUhH52NQlxRIlzUK8mUhavJy0LL6gmAlesBACCBUKRlL7f+EGpT4ulCiq8GPxQhlgB5c3XA\/lXBsbAbdYpdxr5tgwQTq4UUo9PR4fHx+PjUsx1x+JiwAI8UPdB\/LGKCpCrqKL763M4zIvDMSsCNZp4LFsJhjtWHBnhEtJvpmDPg3yyLaZYJ60C3JLLZb+D5B7bMwq0M9C1BfGfS6hyKwJmu2OYKcb0VHXrC9se3t794Zn\/UBnTfjSnpctFksUFmyUrTOIsixqCbUmeGE70zG0dOqOIaf+GNrX2dXXmd833N\/7uc6empDmkeEjWl\/okDx2XJIFYTCRDbJ5qajJyqiEj8tmcuigLAT7zP25\/oQa9GfSbkdN4LtHcJ1xVwSqoCWUhMTMEjVh6xwpheAqM3ydANRESwCmoggqBFBWCjJMGEmkaJaVlGABwZq7Up1t6H531OmDQZGHiLrEhJTP9WV4A1qGoUIF8gqEBQvJQk24STgt1Bfu0J4wB9DDsbCbxgy3GHchG4ZD0XA54+hSlOKETRqx2dGSeY75CJquYwcrMV6GDXaOsdnE9YOVBKwYL8MGGoZbcuhKws2ZRsOzvnQrq2Rb2LbDIXQlQavMl5OqA+2AYoOsKCR2QsaRZZh47OiFAE1MvPC8LMmSydjNxUAxdpsoX2OXmWzF3nEpu6cYMLxQxEipQAwfe+W73H3yU0mspvbhIxP77A40XPJxfXWRsHsOh+2TneDhDOIXdVN+zPXoWJHQmuCHVa\/HUT2buct81zzV2LZUgBl0rN5+FiVDtQCQAS+rGuJlGUJeMyWZV1XZSLC5QAYJqaZNxbDOhlohIaoam3tAcqm4Fgmqngz+46UovvCVNtVQ\/hOmIhfBVOSNxkgExMFnhK2gvaVpoLnpY20EU9bdoBUjeMSBtOSj2BgKPIj9xpbI+MOXv\/+Tqnfhc0fAJysvw2uahNaqZ2Kw5c7KKmH9w+tEAWhABIKkCWAIbL2z2ixsbt4kmv3f8ho27f76413arR9dnsk+dykD1lWUIpFVDc1TkYZvtPS0ffjX93\/QfumpDbc3zuzQ\/7bmex9s3nqte+f5h946+pfGVv\/8l68fa3r1MhXUC7\/8cGDmu5Pb31dTV9s\/\/W5wKnjJzf58Y\/sXjg5d+emT5FdHit+Bu7bf0k4897y87bWvnHnqwuENt5\/8jXKjeDI+ffvo1L8afx3\/8ZWJic\/GNm4b27P6tDtx8oUTbSe2nD3c+\/bMV\/1Ta1MP3rzxALm568iFHX9o73ridwMzwfT6s72PvDz6xy0vX1G+tPbbRu7P3FaY2D74RTq9\/4WP\/nTo2vX8melPXLh45FOPDL8+\/Pe2d\/6x6\/mno++deva9F0\/\/4uTlxx5rnb76yg+VqHl89ed7fnvm2ban3\/zm134mfPBxfKY1f67vn7Pb928x2V9qsRcAAA==',
            'marketplaceId' => Constants\GlobalIds::GB
        ]);
        $service = $sdk->createBrowse();

        $_request = new Types\GetItemRestRequest();
        $_request->item_id = 'v1|383651914606|0';

        $promise = $service->getItemAsync($_request);

        // $_request = new Types\SearchForItemsRestRequest();
        // $_request->q = 'New Google Pixel 3 XL 64GB Factory Unlocked Just Black T-Mobile AT&T Verizon';
        // $_request->filter = 'sellers:{qualitycellz}';
        // $promise = $service->searchForItemsAsync($_request);

        $response = $promise->wait();
        return $response;
    }

}
