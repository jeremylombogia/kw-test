<?php

class ChecklistTest extends TestCase
{
    public function testShouldReturnAllChecklists()
    {
        $this->get("checklists", []);

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'current_page',
            ['data' =>
                ['*' => [
                    'id',
                    'object_domain',
                    'object_id',
                    'description',
                    'is_completed',
                    'completed_at',
                    'updated_by',
                    'urgency',
                    'template_id',
                    'created_at',
                    'updated_at',
                ]],
            ],
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total',
        ]);

    }

    public function testShouldReturnOneChecklist()
    {
        $this->get("checklists/1", []);

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            'id',
            'description',
            'updated_by',
            'urgency',
            'template_id',
            'domain_id',
            'created_at',
            'updated_at',
            ['domain' =>
                ['*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ]],
            ],
        ]);
    }

}
