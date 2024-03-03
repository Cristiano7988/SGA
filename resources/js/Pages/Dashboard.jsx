import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Chart } from 'react-google-charts';

export default function Dashboard(props) {

    const convites = [
        ['Eventos', 'Total'],
        ['Criados', props.eventos],
        ['Comparecidos', props.comparecidos]
    ]
    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {props.eventos || props.eventos_que_compareci ? <Chart
                                data={convites}
                                chartType='PieChart'
                                options={{
                                    title: 'Eventos',
                                    is3D: true
                                }}
                            /> : <p>Não há registros de eventos</p>}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
