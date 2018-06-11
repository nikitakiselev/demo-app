export default [
    {
        id: 'first_name',
        label: 'First Name',
        type: 'string'
    },
    {
        id: 'last_name',
        label: 'Last Name',
        type: 'string'
    },
    {
        id: 'phone',
        label: 'Phone',
        type: 'string'
    },
    {
        id: 'email',
        label: 'Email',
        type: 'string'
    },
    {
        id: 'status',
        label: 'Status',
        type: 'string',
        input: 'select',
        values: {
            'new': 'New',
            'not-verified': 'Not Verified',
            'confirmed': 'Confirmed',
            'canceled': 'Canceled',
            'closed': 'Closed'
        },
        operators: ['equal', 'not_equal']
    }
];
