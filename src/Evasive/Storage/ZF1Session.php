<?php
namespace Evasive\Storage;

class ZF1Session implements StorageInterface
{

    const SESSION_NAMESPACE = 'phpevasive';
    
    public function get()
    {
        $session = new \Zend_Session_Namespace(self::SESSION_NAMESPACE);
        
        if (! empty($session)) {
            return $session->data;
        }
        
        return null;
    }

    public function store($data)
    {
        $session = new \Zend_Session_Namespace(self::SESSION_NAMESPACE);
        $session->data = $data;

        session_write_close();
        session_start();
    }

    public function update($data)
    {
        $session = new \Zend_Session_Namespace(self::SESSION_NAMESPACE);
        
        foreach ($data as $key => $value) {
            $session->data[$key] = $value;
        }
        
        session_write_close();
        session_start();
        
    }
}
