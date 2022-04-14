<?php

namespace MeituanUnion\request\traits;

trait PaginationTrait
{
    public $pageSize = 20;      // 页大小，默认20，1~100
    public $pageNo = 1;         // 第几页，默认：１

    /**
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): self
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo): self
    {
        $this->pageNo = $pageNo;
        return $this;
    }
}