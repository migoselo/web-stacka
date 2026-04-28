const API_URL = process.env.NEXT_PUBLIC_API_URL;

export type MemoType = "note" | "image";

export interface DemoMemo {
  id: number;
  type: MemoType;
  content: string;
  created_at: string;
  expires_at: string;
}

export async function getMemos(): Promise<DemoMemo[]> {
  const res = await fetch(`${API_URL}/demo-memos`, {
    headers: { Accept: "application/json" },
  });
  return res.json();
}

export async function createMemo(
  type: MemoType,
  content: string,
): Promise<DemoMemo> {
  const res = await fetch(`${API_URL}/demo-memos`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify({ type, content }),
  });

  if (res.status === 429) {
    throw new Error("Too many requests, please try again in a minute");
  }

  if (!res.ok) {
    const data = await res.json();
    throw new Error(data.message || "Failed to save");
  }

  return res.json();
}

export async function deleteMemo(id: number): Promise<void> {
  await fetch(`${API_URL}/demo-memos/${id}`, {
    method: "DELETE",
    headers: { Accept: "application/json" },
  });
}
