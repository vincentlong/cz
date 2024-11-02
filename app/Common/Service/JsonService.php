<?php

namespace App\Common\Service;

class JsonService
{
    public static function success(string $msg = 'success', array $data = [], int $code = 1, int $show = 1)
    {
        return self::result($code, $show, $msg, $data);
    }

    public static function fail(string $msg = 'fail', array $data = [], int $code = 0, int $show = 1)
    {
        return self::result($code, $show, $msg, $data);
    }

    public static function data($data)
    {
        return self::success('', $data, 1, 0);
    }

    private static function result(int $code, int $show, string $msg = 'OK', array $data = [], int $httpStatus = 200)
    {
        $result = compact('code', 'show', 'msg', 'data');
        return response()->json($result, $httpStatus);
    }

    public static function throw(string $msg = 'fail', array $data = [], int $code = 0, int $show = 1)
    {
        $data = compact('code', 'show', 'msg', 'data');
        throw new \App\Exception\HttpResponseException($data);
    }

    public static function throwWithHttpCode(string $msg = 'fail', $httpCode=200, array $data = [], int $code = 0, int $show = 1)
    {
        $data = compact('code', 'show', 'msg', 'data');
        throw new \App\Exception\HttpResponseException($data, $httpCode);
    }

//    public static function dataLists(BaseDataLists $lists): Json
//    {
//        //获取导出信息
//        if ($lists->export == ExportEnum::INFO && $lists instanceof ListsExcelInterface) {
//            return self::data($lists->excelInfo());
//        }
//
//        //获取导出文件的下载链接
//        if ($lists->export == ExportEnum::EXPORT && $lists instanceof ListsExcelInterface) {
//            $exportDownloadUrl = $lists->createExcel($lists->setExcelFields(), $lists->lists());
//            return self::success('', ['url' => $exportDownloadUrl], 2);
//        }
//
//        $data = [
//            'lists' => $lists->lists(),
//            'count' => $lists->count(),
//            'page_no' => $lists->pageNo,
//            'page_size' => $lists->pageSize,
//        ];
//        $data['extend'] = [];
//        if ($lists instanceof ListsExtendInterface) {
//            $data['extend'] = $lists->extend();
//        }
//        return self::success('', $data, 1, 0);
//    }
}
