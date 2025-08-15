import { garageCar } from "@repo/api-client";

export default async function User({
  params,
}: {
  params: Promise<{ car: string }>;
}) {
  const { car } = await params;
  const { data } = await garageCar(car);
  return (
    <div className="font-sans grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20">
      <main className="flex flex-col gap-[32px] row-start-2 items-center sm:items-start">
        <ul className="font-mono list-inside text-sm/6 text-center sm:text-left">
          <li className="tracking-[-.01em]">{data.model}</li>
        </ul>
      </main>
    </div>
  );
}
