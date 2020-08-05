<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sms_log}}`.
 */
class m200805_080550_create_sms_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sms_log}}', [
            'id' => $this->primaryKey(),
            'phone_number' => $this->string(),
            'message' => $this->text(),
            'state' => $this->string(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sms_log}}');
    }
}
