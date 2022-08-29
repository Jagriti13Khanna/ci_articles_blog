<!-- models/Crud_model.php  -->
<?php 
class Home_model extends CI_Model 
{ 
    function __construct() 
    { 
        // Call the Model constructor 
        parent::__construct(); 
    } 

    function get_articles()
    { 
        $query = $this->db->get('ci_articles'); 
        if ( $query->num_rows() > 0 )
        { 
            return $query->result(); 
        }
        else
        { 
            return FALSE; 
        } 
    }

    function get_article_detail($id)
    { 
        $this->db->where('article_id', $id); 
        $query = $this->db->get('ci_articles'); 
        if ( $query->num_rows() > 0 )
        { 
            return $query->result(); 
        }
        else
        { 
            return FALSE; 
        } 
    } 

    function insert_article($data)
    { 
        $this->db->insert('ci_articles', $data); 
    }

    function edit_article($data,$id)
    { 

        $this->db->where('article_id', $id); 
        $this->db->update('ci_articles', $data); 
    }

    function delete_article($data,$id)
    { 
        $this->db->where('article_id', $id); 
        $this->db->delete('ci_articles'); 
    }
}