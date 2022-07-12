<?php

namespace MeituanUnion\request\traits;

trait PaginationTrait
{
    /**
     * @var int 页大小，1~100 默认20
     */
    public $pageSize = 20;

    /**
     * @var int 第几页
     */
    public $pageNo = 1;

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
