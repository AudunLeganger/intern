import { useContext, useLayoutEffect, useRef } from "react"
import { TitleContext } from "./TitleProvider"

export function useTitle(title: string) {
  const ref = useRef(Symbol())
  const context = useContext(TitleContext)

  useLayoutEffect(() => {
    context.registerTitle(ref.current, title)
    return () => {
      context.unregisterTitle(ref.current)
    }
  }, [])

  useLayoutEffect(() => {
    context.updateTitle(ref.current, title)
  }, [title])
}

export function PageTitle({ title }: { title: string }) {
  useTitle(title)
  return null
}
