<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Models;

use CodeIgniter\Model;
class ClientModel extends Model {
    // Enable timestamps if your table uses `created_at` and `updated_at`
    protected $useTimestamps = false;
    // Define any date fields for automatic conversion
    protected $dateFormat = 'datetime';
    protected $table = 'tm_clients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','client_type_id','reg_name', 'reg_no', 're_address', 'contact_person'];
    protected $returnType = 'object';

    /**
     * Get paginated and optionally sorted client data.
     *
     * @param int    $limit    Number of records to return
     * @param int    $offset   Offset for pagination
     * @param string $sort_by  Column to sort by (e.g., 'reg_name', 'reg_no')
     * @param string $order    ASC or DESC
     * @return array
     */
    public function get_clients($limit, $offset, $sort_by, $order)
    {
        // Sanitize sorting
        $valid_sort_columns = ['reg_name', 'reg_no'];
        if (!in_array($sort_by, $valid_sort_columns)) {
            $sort_by = 'reg_name'; // default
        }

        // Sanitize order
        $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

        $this->db->limit($limit, $offset);
        $this->db->order_by($sort_by, $order);

        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * Count total clients (for pagination).
     */
    public function count_clients()
    {
        return $this->db->count_all($this->table);
    }

    public function getCompanyDetailsById($id)
    {
        return $this->db->table($this->table)
            ->select('tm_clients.id, tm_clients.reg_name, 
            tm_clients.reg_no, tm_clients.re_address, 
            tm_client_types.type_desc, 
            tm_users.f_name, tm_users.l_name, tm_users.email_addr, tm_users.tel_no,
            tm_clients.contact_person' 
            
            )
            ->join('tm_client_types', 'tm_client_types.type_id = tm_clients.client_type_id')
            ->join('tm_users', 'tm_users.user_id = tm_clients.contact_person')
            ->where('tm_clients.id', $id)
            ->get()
            ->getRow(); // Fetch a single result
    }
}
