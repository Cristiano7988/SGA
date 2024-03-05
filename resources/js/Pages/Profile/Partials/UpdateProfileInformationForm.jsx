import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Link, useForm, usePage } from '@inertiajs/react';
import { Transition } from '@headlessui/react';
import { useState } from 'react';
import SecondaryButton from '@/Components/SecondaryButton';

export default function UpdateProfileInformation({ mustVerifyEmail, status }) {
    const user = usePage().props.auth.user;
    const [removerFoto, setRemoverFoto] = useState(!user.foto);

    const { data, setData, post, errors, processing, recentlySuccessful } = useForm({
        nome: user.nome,
        email: user.email,
        data_de_nascimento: user.data_de_nascimento ?? "",
        telefone: user.telefone ?? "",
        foto: user.foto ?? "",
        remover_foto: removerFoto
    });

    const handleClick = () => {
        setRemoverFoto(!removerFoto);
        setData('remover_foto', !removerFoto);
    }

    const submit = (e) => {
        e.preventDefault();

        post(route('profile.update'));
    };

    const hoje = new Date();
    const idadeMinima = 14;
    const indiceDoUltimoCaracterDaData = 10;
    hoje.setFullYear( hoje.getFullYear() - idadeMinima);

    return (
        <section>
            <header>
                <h2 className="text-lg font-medium text-gray-900">Informações do Perfil</h2>

                <p className="mt-1 text-sm text-gray-600">
                    Atualize suas informações de perfil
                </p>
            </header>

            <form onSubmit={submit} className="flex mt-3 formulario-de-atualizacao-do-usuario" encType="multipart/form-data">
                <div className='grow'>
                    {removerFoto ? <>
                        <InputLabel htmlFor="file" value="Foto" />

                        <TextInput
                            id="foto"
                            type="file"
                            className="mt-1 block w-3/4 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none light:bg-slate-900 light:border-gray-700 light:text-gray-400 light:focus:outline-none light:focus:ring-1 light:focus:ring-gray-600 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 light:file:bg-gray-700 light:file:text-gray-400"
                            onChange={(e) => setData('foto', e.target.files[0])}
                        />

                        {user.foto && <SecondaryButton
                            className="mt-3"
                            style={{fontSize: "10px"}}
                            onClick={handleClick}
                            children="Manter foto"
                        />} 
                    </>
                    : <>
                        <div
                            style={{
                                width: "150px",
                                height:"150px",
                                borderRadius: "50%",
                                border: "1px solid #e5e7eb",
                                background: 'ghostwhite',
                                backgroundImage: 'url(/storage/fotos_dos_usuarios/'+user.foto+')',
                                backgroundSize: 'cover',
                                backgroundPosition: "center"
                            }} 
                        />
                        <SecondaryButton
                            className="mt-3 ml-4"
                            style={{fontSize: "10px"}}
                            onClick={handleClick}
                            children="Remover foto"
                        />
                    </>}
                </div>
                <div className="grow space-y-6">
                    <div>
                        <InputLabel htmlFor="nome" value="Nome" />

                        <TextInput
                            id="nome"
                            className="mt-1 block w-full"
                            value={data.nome}
                            onChange={(e) => setData('nome', e.target.value)}
                            required
                            isFocused
                            autoComplete="nome"
                        />

                        <InputError className="mt-2" message={errors.nome} />
                    </div>

                    <div>
                        <InputLabel htmlFor="data_de_nascimento" value="Data de nascimento" />

                        <TextInput
                            id="data_de_nascimento"
                            type="date"
                            className="mt-1 block w-full"
                            max={hoje.toISOString().substring(0, indiceDoUltimoCaracterDaData)}
                            value={data.data_de_nascimento}
                            onChange={(e) => setData('data_de_nascimento', e.target.value)}
                        />

                        <InputError className="mt-2" message={errors.data_de_nascimento} />
                    </div>

                    <div>
                        <InputLabel htmlFor="telefone" value="Telefone" />

                        <TextInput
                            id="telefone"
                            type="tel"
                            className="mt-1 block w-full"
                            value={data.telefone}
                            onChange={(e) => setData('telefone', e.target.value)}
                        />
                        

                        <InputError className="mt-2" message={errors.telefone} />
                    </div>

                    <div>
                        <InputLabel htmlFor="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            className="mt-1 block w-full"
                            value={data.email}
                            onChange={(e) => setData('email', e.target.value)}
                            required
                            autoComplete="username"
                        />

                        <InputError className="mt-2" message={errors.email} />
                    </div>

                    {mustVerifyEmail && user.email_verified_at === null && (
                        <div>
                            <p className="text-sm mt-2 text-gray-800">
                                Seu endereço de email não está verificado.
                                <Link
                                    href={route('verification.send')}
                                    method="post"
                                    as="button"
                                    className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Clique aqui para reenviar o email de verificação.
                                </Link>
                            </p>

                            {status === 'verification-link-sent' && (
                                <div className="mt-2 font-medium text-sm text-green-600">
                                    Um novo link de verificação foi enviado para o seu email.
                                </div>
                            )}
                        </div>
                    )}

                    <div className="flex items-center gap-4">
                        <PrimaryButton disabled={processing}>Salvar</PrimaryButton>

                        <Transition
                            show={recentlySuccessful}
                            enterFrom="opacity-0"
                            leaveTo="opacity-0"
                            className="transition ease-in-out"
                        >
                            <p className="text-sm text-gray-600">Salvo.</p>
                        </Transition>
                    </div>
                </div>
            </form>
        </section>
    );
}
