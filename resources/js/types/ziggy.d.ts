declare global {
    function route(
        name?: string,
        params?: number,
        absolute?: boolean,
        config?: never,
    ): string;
}

export {};
