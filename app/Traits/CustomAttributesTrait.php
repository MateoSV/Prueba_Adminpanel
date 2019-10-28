<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait CustomAttributesTrait
{
    /**
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    public function setAttribute($name, $value)
    {

        if ($value) {
            if ($this->isFileAttr($name)) {
                return $this->setFileAttr($name, $value);
            }
        }

        return parent::setAttribute($name, $value);
    }


    /**
     * @param $name
     * @return bool
     */
    protected function isFileAttr($name)
    {
        return is_array($this->file_fields ?? null) &&
            in_array($name, $this->file_fields, true);
    }


    /**
     * @param $name
     * @param $file
     * @return $this
     */
    protected function setFileAttr($name, $file)
    {
        if ($file instanceof UploadedFile) {
            if (isset($this->attributes[$name])) {
                Storage::delete($this->attributes[$name]);
            }
            $path = $file->store($this->getTable());
            $this->attributes[$name] = $path;
        }
        return $this;
    }
}
