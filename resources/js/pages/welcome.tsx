import { PageWrapper } from "@/components/PageWrapper";
import { Container } from "@/components/Container";
import { Header } from "@/components/Header";
import { Search } from "@/components/Search";
import { Shortlist } from "@/components/Shortlist";
import { PuppiesList } from "@/components/PuppiesList";
import { NewPuppyForm } from "@/components/NewPuppyForm";

import { Suspense, use, useState } from "react";
import { Puppy } from "@/types";
import { LoaderCircle } from "lucide-react";
import { getPuppies } from "@/queries";
import { ErrorBoundary } from "react-error-boundary";

export default function App({ puppies }: { puppies: Puppy[] }) {
    return (
        <PageWrapper>
            <Container>
                <Header />
                <pre className="text-black">{JSON.stringify(puppies, null, 2)}</pre>
                <ul className="flex gap-4 mt-4 flex-wrap">
                    {puppies.map((puppy, index) => (
                        <li className="bg-white text-black p-6 ring ring-black/10 flex gap-2" key={index}>
                            <img src={puppy.imageUrl} alt={puppy.name} className="size-24  object-cover" />
                            <div>
                                <h2>{puppy.name}</h2>
                                <p>{puppy.user.name}</p>
                            </div>
                        </li>
                    ))}
                </ul>
                <ErrorBoundary
                    fallbackRender={({ error }) => (
                        <div className="mt-12 bg-red-100 p-6 shadow ring ring-black/5">
                            <p className="text-red-500">
                                {error.message}: {error.details}
                            </p>
                        </div>
                    )}
                >
                    <Suspense
                        fallback={
                            <div className="mt-12 grid h-48 place-items-center">
                                <LoaderCircle className="animate-spin stroke-slate-300" />
                            </div>
                        }
                    >
                        <Main />
                    </Suspense>
                </ErrorBoundary>
            </Container>
        </PageWrapper>
    );
}

const puppyPromise = getPuppies();

function Main() {
    const apiPuppies = use(puppyPromise);
    const [searchQuery, setSearchQuery] = useState("");
    const [puppies, setPuppies] = useState<Puppy[]>(apiPuppies);

    return (
        <main>
            <div className="mt-24 grid gap-8 sm:grid-cols90-2">
                <Search searchQuery={searchQuery} setSearchQuery={setSearchQuery} />
                <Shortlist puppies={puppies} setPuppies={setPuppies} />
            </div>
            <PuppiesList
                puppies={puppies}
                setPuppies={setPuppies}
                searchQuery={searchQuery}
            />
            <NewPuppyForm puppies={puppies} setPuppies={setPuppies} />
        </main>
    );
}
