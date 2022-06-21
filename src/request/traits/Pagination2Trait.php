<?php

namespace MeituanUnion\request\traits;

trait Pagination2Trait
{
    public $page = 1;
    public $limit = 20;

    /**
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo = 1): self
    {
        $this->page = $pageNo;
        return $this;
    }

    /**
     * 同setPageNo
     * @param int $page
     * @return $this
     */
    public function setPage(int $page = 1): self
    {
        return $this->setPageNo($page);
    }

    /**
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize): self
    {
        $this->limit = $pageSize;
        return $this;
    }

    /**
     * 同setPageSize
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): self
    {
        return $this->setPageSize($limit);
    }
}
