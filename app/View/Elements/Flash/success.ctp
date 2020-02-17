$this->Flash->success('The user has been saved', array(
    'key' => 'positive',
    'params' => array(
        'name' => $user['User']['name'],
        'email' => $user['User']['email']
    )
));
