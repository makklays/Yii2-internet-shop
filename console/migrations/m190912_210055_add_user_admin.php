<?php
use yii\db\Migration;
use common\models\User;

/**
 * Class m190912_210055_add_user_admin
 */
class m190912_210055_add_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin';
        $user->email = 'phpdevops@gmail.com';
        $user->setPassword('admin');
        $user->generateAuthKey();
        $user->status = 10;
        if ($user->save()) {
            echo 'good';
        }

        $user = new User();
        $user->username = 'user';
        $user->email = 'makklays@gmail.com';
        $user->setPassword('user');
        $user->generateAuthKey();
        $user->status = 10;
        if ($user->save()) {
            echo 'good';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190912_210055_add_user_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190912_210055_add_user_admin cannot be reverted.\n";

        return false;
    }
    */
}
