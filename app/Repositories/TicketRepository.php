<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\BaseRepository;

/**
 * Class TicketRepository
 * @package App\Repositories
 * @version November 12, 2019, 5:14 am +0330
*/

class TicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ticket::class;
    }


    public function findByUserId($id)
    {
        $result = Ticket::where('user_id','=',$id)->orderBy('created_at', 'DESC');

        return $result;
    }

    public function findByOrganizationId($organization_ids)
    {
        $result = Ticket::whereIn('organization_id',$organization_ids)->orderBy('created_at', 'DESC');

        return $result;
    }
}
