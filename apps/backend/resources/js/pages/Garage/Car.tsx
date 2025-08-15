import { GarageCarProps } from '@/lib/inertia';

export default function Page({ model }: GarageCarProps) {
    return (
        <div className="grid min-h-screen grid-rows-[20px_1fr_20px] items-center justify-items-center gap-16 p-8 pb-20 font-sans sm:p-20">
            <main className="row-start-2 flex flex-col items-center gap-[32px] sm:items-start">
                <ol className="list-inside text-center font-mono text-sm/6 sm:text-left">
                    <li>{model}</li>
                </ol>
            </main>
        </div>
    );
}
