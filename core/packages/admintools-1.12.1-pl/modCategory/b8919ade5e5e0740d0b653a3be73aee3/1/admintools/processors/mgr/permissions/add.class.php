<?php

/**
 * Add resource permissions
 */
class resourcePermissionsCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'admintools_permissions';
	public $classKey = 'adminToolsPermissions';
	public $permission = 'access_permissions';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$rid = $this->getProperty('rid');
		list($type, $principal) = explode('-', $this->getProperty('principal'));
        if ($this->modx->getCount($this->classKey, array('rid' => $rid, 'principal_type' => $type, 'principal' => $principal ))) {
            $this->modx->error->addField('principal', $this->modx->lexicon('admintools_permissions_err_ae'));
            return parent::beforeSet();
        }
        switch ($type) {
            case 'all':
                $weight = 0;
                break;
            case 'gst':
                $weight = 1;
                break;
            case 'grp':
                $weight = 10;
                break;
            case 'usr':
                $weight = 100;
                break;
        }
        if ($type != 'grp') $this->setProperty('priority', 0);
        $this->setProperty('weight', $weight);
        $this->setProperty('principal_type', $type);
        $this->setProperty('principal', $principal);

		return parent::beforeSet();
	}
}

return 'resourcePermissionsCreateProcessor';